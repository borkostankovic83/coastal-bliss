<?php
session_start();
require_once "../../database.php";
require_once('layout/header.php');  // Include the header
require_once('layout/navbar.php');  // Include the navbar

$conn = getDatabaseConnection();

// Pagination settings
$limit = 10; // Number of records per page
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $limit;

// Sorting settings
$sort_column = isset($_GET['sort']) ? $_GET['sort'] : 'id';
$sort_order = isset($_GET['order']) && strtolower($_GET['order']) === 'asc' ? 'ASC' : 'DESC';

// Allowed columns to prevent SQL injection
$allowed_columns = ['id', 'name', 'email', 'position', 'license_status', 'start_date'];
if (!in_array($sort_column, $allowed_columns)) {
    $sort_column = 'id';
}

// Count total records for pagination
$count_sql = "SELECT COUNT(*) AS total FROM job_applications";
$count_result = $conn->query($count_sql);
$total_records = $count_result->fetch_assoc()['total'];
$total_pages = ceil($total_records / $limit);

// Fetch applicants with pagination and sorting
// $sql = "SELECT * FROM job_applications ORDER BY $sort_column $sort_order LIMIT $limit OFFSET $offset";
$sql = "SELECT * FROM job_applications ORDER BY id DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Applicants List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    th a {
      text-decoration: none;
      color: inherit;
     }
    th a:hover {
      text-decoration: underline;
     }
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
    }
    h2 {
        color: #beac5a !important;
    }
    .container {
      margin-top: 30px;
    }
    .table thead {
      background-color: #beac5a;
      color: white;
    }
    .table-striped tbody tr:nth-of-type(odd) {
      background-color: #f9f9f9;
    }
    .btn-view {
      color: #fff;
      background-color: #474c55;
      border: none;
    }
    .btn-view:hover {
      background-color: #2c2f36;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2 class="mb-4">Applicants List</h2>
    <?php
      $host = $_SERVER['HTTP_HOST'];
      $basePath = ($host === 'localhost') ? '/coastal-bliss' : '';
    ?>
    <?php if ($result && $result->num_rows > 0): ?>
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <?php
                // Fetch column names dynamically
                $columns = array_keys($result->fetch_assoc()); // Get column names from the first row
                foreach ($columns as $column) {
                  // Create sortable headers
                  $order = ($sort_column == $column && $sort_order == 'ASC') ? 'desc' : 'asc';
                  echo "<th><a href=\"?sort=$column&order=$order\">" . ucfirst(str_replace('_', ' ', $column)) . "</a></th>";
                }
              ?>
            </tr>
          </thead>
          <tbody>
            <?php
              // Rewind the result to start from the first row after fetching column names
              $result->data_seek(0);
              while($row = $result->fetch_assoc()):
            ?>
              <tr>
                <?php
                foreach ($columns as $column) {
                 if ($column === 'cover_letter' || $column === 'experience' || $column === 'referral' || $column === 'availability') {
                   $fullTextRaw = trim($row[$column]);
                   $isShort = mb_strlen($fullTextRaw) <= 20;

                   $previewText = htmlspecialchars(mb_strimwidth($fullTextRaw, 0, 20, '...'));
                   $fullText = nl2br(htmlspecialchars($fullTextRaw));

                   echo "<td>
                     <div class='text-preview-container'>";

                   if ($isShort) {
                     // Just show the full content (no toggle)
                     echo "<div class='text-full' style='display: block;'>$fullText</div>";
                   } else {
                     // Show preview and toggle controls
                     echo "
                       <div class='text-preview' style='display: block;'>$previewText
                         <a href='javascript:void(0);' class='toggle-more' style='color: #beac5a;'>more</a>
                       </div>
                       <div class='text-full' style='display: none;'>$fullText
                         <a href='javascript:void(0);' class='toggle-less' style='color: #beac5a;'>less</a>
                       </div>";
                   }

                   echo "</div></td>";
                   continue;
                 }


                  if ($column === 'resume_path') {
                    echo "<td>
                      <button class='btn btn-view view-resume-btn d-none d-md-inline' data-resume='" . $basePath . htmlspecialchars($row[$column]) . "'>Preview</button>
                      <a href='" . $basePath . htmlspecialchars($row[$column]) . "' class='btn btn-view d-inline d-md-none' download>Download</a>
                    </td>";
                    continue; // 🔥 skip to next column
                  }

                  // Fallback render for normal columns
                  echo "<td>" . htmlspecialchars($row[$column]) . "</td>";
                }

                ?>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>

      </div>
    <?php else: ?>
      <p class="text-center">No applicants found.</p>
    <?php endif; ?>
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

  <!-- Resume Modal -->
  <div class="modal fade" id="resumeModal" tabindex="-1" aria-labelledby="resumeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="resumeModalLabel">Resume Preview</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <iframe id="resumeFrame" src="" width="100%" height="600px" style="border: none;"></iframe>
        </div>
        <div class="modal-footer">
          <a id="downloadResume" href="#" class="btn btn-success" download target="_blank">Download Resume</a>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const resumeModal = new bootstrap.Modal(document.getElementById('resumeModal'));
      const resumeFrame = document.getElementById('resumeFrame');
      const downloadLink = document.getElementById('downloadResume');

      document.querySelectorAll('.view-resume-btn').forEach(button => {
        button.addEventListener('click', () => {
          const resumePath = button.getAttribute('data-resume');
          const baseURL = window.location.origin;
          const filePath = button.getAttribute('data-resume');
          const fullURL = `${baseURL}${filePath}`;
          const isWord = /\.(docx?|DOCX?)$/.test(filePath);
          const isPDF = /\.pdf$/i.test(filePath);

          if (isWord) {
            resumeFrame.src = `https://docs.google.com/gview?url=${fullURL}&embedded=true`;
          } else if (isPDF) {
            resumeFrame.src = fullURL;
          } else {
            resumeFrame.src = '';
          }

          downloadLink.href = fullURL;
          resumeModal.show();

        });
      });
    });
  </script>

</body>
</html>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.toggle-more').forEach(btn => {
      btn.addEventListener('click', function () {
        const container = this.closest('.text-preview-container');
        container.querySelector('.text-preview').style.display = 'none';
        container.querySelector('.text-full').style.display = 'block';
      });
    });

    document.querySelectorAll('.toggle-less').forEach(btn => {
      btn.addEventListener('click', function () {
        const container = this.closest('.text-preview-container');
        container.querySelector('.text-full').style.display = 'none';
        container.querySelector('.text-preview').style.display = 'block';
      });
    });
  });
</script>

<?php
$conn->close();
?>
