<?php
session_start();

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
require_once "../../database.php";
$conn = getDatabaseConnection();

// Check if it's an AJAX request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    header('Content-Type: application/json');  // Ensure the response is JSON

    $id = intval($_POST['id']);
    $action = $_POST['action'];
    $response = ['success' => false];

    // Process the action (like, unlike, delete)
    if ($action === 'like') {
        $query = "UPDATE contact_submissions SET is_liked = 1 WHERE id = ?";
    } elseif ($action === 'unlike') {
        $query = "UPDATE contact_submissions SET is_liked = 0 WHERE id = ?";
    } elseif ($action === 'delete') {
        // Check if it's liked, cannot delete liked submissions
        $checkQuery = "SELECT is_liked FROM contact_submissions WHERE id = ?";
        $stmt = $conn->prepare($checkQuery);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        if ($result['is_liked'] == 1) {
            $response['error'] = 'Cannot delete liked submissions.';
            echo json_encode($response);
            exit();
        }

        $query = "DELETE FROM contact_submissions WHERE id = ?";
    }

    // Prepare and execute the query
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $response['success'] = true;
    } else {
        $response['error'] = 'Error processing request.';
    }

    echo json_encode($response);  // Send JSON response
    exit();
}

// Regular page load (not an AJAX request)
require_once('layout/header.php');  // Include the header
require_once('layout/navbar.php');  // Include the navbar

// Pagination settings
$limit = 10; // Number of records per page
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $limit;

// Sorting settings
$sort_column = isset($_GET['sort']) ? $_GET['sort'] : 'submitted_at';
$sort_order = isset($_GET['order']) && strtolower($_GET['order']) === 'asc' ? 'ASC' : 'DESC';

// Allowed columns to prevent SQL injection
$allowed_columns = ['id', 'name', 'email', 'phone', 'subject', 'submitted_at'];
if (!in_array($sort_column, $allowed_columns)) {
    $sort_column = 'submitted_at';
}

// Count total records for pagination
$count_sql = "SELECT COUNT(*) AS total FROM contact_submissions";
$count_result = $conn->query($count_sql);
$total_records = $count_result->fetch_assoc()['total'];
$total_pages = ceil($total_records / $limit);

// Fetch submissions with pagination and sorting
$sql = "SELECT *
        FROM contact_submissions
        ORDER BY $sort_column $sort_order
        LIMIT $limit OFFSET $offset";

$result = $conn->query($sql);
?>

<div class="container mt-5">
    <h2 class="mb-4">Contact Submissions</h2>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th><a href="?sort=id&order=<?php echo ($sort_column == 'id' && $sort_order == 'ASC') ? 'desc' : 'asc'; ?>">ID</a></th>
                    <th><a href="?sort=name&order=<?php echo ($sort_column == 'name' && $sort_order == 'ASC') ? 'desc' : 'asc'; ?>">Name</a></th>
                    <th><a href="?sort=email&order=<?php echo ($sort_column == 'email' && $sort_order == 'ASC') ? 'desc' : 'asc'; ?>">Email</a></th>
                    <th><a href="?sort=email&order=<?php echo ($sort_column == 'phone' && $sort_order == 'ASC') ? 'desc' : 'asc'; ?>">Phone</a></th>
                    <th><a href="?sort=subject&order=<?php echo ($sort_column == 'subject' && $sort_order == 'ASC') ? 'desc' : 'asc'; ?>">Subject</a></th>
                    <th><a href="?sort=subject&order=<?php echo ($sort_column == 'message' && $sort_order == 'ASC') ? 'desc' : 'asc'; ?>">Message</a></th>
                    <th><a href="?sort=submitted_at&order=<?php echo ($sort_column == 'submitted_at' && $sort_order == 'ASC') ? 'desc' : 'asc'; ?>">Date</a></th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) {
                    $isLiked = $row['is_liked'] == 1;
                ?>
                    <tr id="row_<?php echo $row['id']; ?>">
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['phone']); ?></td>
                        <td><?php echo htmlspecialchars($row['subject']); ?></td>
                        <td><?php echo htmlspecialchars($row['message']); ?></td>
                        <td><?php echo $row['submitted_at']; ?></td>
                        <td>
                            <button class="btn btn-sm <?php echo $isLiked ? 'btn-danger' : 'btn-success'; ?>"
                                    onclick="toggleLike(<?php echo $row['id']; ?>, <?php echo $row['is_liked']; ?>)"
                                    id="like_btn_<?php echo $row['id']; ?>">
                                <?php echo $isLiked ? 'Unlike' : 'Like'; ?>
                            </button>
                            <button class="btn btn-sm btn-secondary"
                                    onclick="deleteSubmission(<?php echo $row['id']; ?>)"
                                    id="delete_btn_<?php echo $row['id']; ?>"
                                    <?php echo $isLiked ? 'disabled' : ''; ?>>
                                Delete
                            </button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <nav>
        <ul class="pagination justify-content-center">
            <li class="page-item <?php if ($page <= 1) echo 'disabled'; ?>">
                <a class="page-link" href="?page=1&sort=<?php echo $sort_column; ?>&order=<?php echo $sort_order; ?>">First</a>
            </li>
            <li class="page-item <?php if ($page <= 1) echo 'disabled'; ?>">
                <a class="page-link" href="?page=<?php echo $page - 1; ?>&sort=<?php echo $sort_column; ?>&order=<?php echo $sort_order; ?>">Prev</a>
            </li>
            <li class="page-item disabled"><a class="page-link">Page <?php echo $page; ?> of <?php echo $total_pages; ?></a></li>
            <li class="page-item <?php if ($page >= $total_pages) echo 'disabled'; ?>">
                <a class="page-link" href="?page=<?php echo $page + 1; ?>&sort=<?php echo $sort_column; ?>&order=<?php echo $sort_order; ?>">Next</a>
            </li>
            <li class="page-item <?php if ($page >= $total_pages) echo 'disabled'; ?>">
                <a class="page-link" href="?page=<?php echo $total_pages; ?>&sort=<?php echo $sort_column; ?>&order=<?php echo $sort_order; ?>">Last</a>
            </li>
        </ul>
    </nav>
</div>

<!-- JavaScript for Like/Unlike and Delete without Refresh -->
<script>
function toggleLike(id, isLiked) {
    const action = isLiked == 1 ? 'unlike' : 'like';
    sendRequest(action, id);
}

function deleteSubmission(id) {
    if (confirm('Are you sure you want to delete this submission?')) {
        sendRequest('delete', id);
    }
}

function sendRequest(action, id) {
    const formData = new FormData();
    formData.append('action', action);
    formData.append('id', id);

    fetch('', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())  // Ensure the response is parsed as JSON
    .then(jsonData => {
        if (jsonData.success) {
            if (action === 'delete') {
                document.getElementById('row_' + id).remove();
            } else {
                const likeBtn = document.getElementById('like_btn_' + id);
                const deleteBtn = document.getElementById('delete_btn_' + id);

                if (action === 'like') {
                    likeBtn.className = 'btn btn-sm btn-danger';
                    likeBtn.innerText = 'Unlike';
                    likeBtn.setAttribute('onclick', `toggleLike(${id}, 1)`);
                    deleteBtn.disabled = true;
                } else if (action === 'unlike') {
                    likeBtn.className = 'btn btn-sm btn-success';
                    likeBtn.innerText = 'Like';
                    likeBtn.setAttribute('onclick', `toggleLike(${id}, 0)`);
                    deleteBtn.disabled = false;
                }
            }
        } else {
            alert(jsonData.error || 'Error processing request.');
        }
    })
    .catch(error => console.error('Error:', error));
}
</script>

<style>
    /* Make the table scrollable on smaller screens */
    .table-responsive {
        overflow-x: auto;
    }

    /* Make text links in table headers more prominent */
    th a {
        text-decoration: none;
        color: inherit;
    }

    th a:hover {
        text-decoration: underline;
    }

    .pagination .page-link {
        color: #333; /* Dark Gray for Pagination */
    }

    /* Buttons to be a little bigger on mobile */
    .btn-sm {
        min-width: 90px; /* Slightly larger buttons for mobile */
        padding: 0.5rem;
    }

    /* Align the pagination */
    .pagination {
        justify-content: center;
    }

    /* Smaller adjustments for smaller screens */
    @media (max-width: 768px) {
        .container {
            padding: 0 15px;
        }

        .table th, .table td {
            padding: 8px;
        }

        .table {
            font-size: 14px;
        }

        .btn-sm {
            min-width: 70px;
        }
    }
</style>
