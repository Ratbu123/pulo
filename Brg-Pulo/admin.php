<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Employer Dashboard</title>
  <link rel="stylesheet" href="/PULO/Brg-Pulo/styles/styles.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <style>
    .dashboard-container {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }

    @media (min-width: 768px) {
      .dashboard-container {
        flex-direction: row;
      }
    }

    .sidebar {
      background: #2c3e50;
      color: white;
      width: 250px;
      padding: 1rem;
      flex-shrink: 0;
      transition: transform 0.3s ease-in-out;
    }

    .sidebar.hidden {
      transform: translateX(-100%);
    }

    .sidebar-header {
      text-align: center;
      margin-bottom: 2rem;
    }

    .sidebar-header img.icon {
      width: 60px;
      height: 60px;
      border-radius: 50%;
    }

    nav a {
      display: flex;
      align-items: center;
      padding: 0.75rem;
      color: white;
      text-decoration: none;
      border-radius: 5px;
      margin-bottom: 0.5rem;
      transition: background 0.2s;
    }

    nav a i {
      margin-right: 10px;
    }

    nav a:hover,
    nav a.active {
      background: #34495e;
    }

    .topbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: #ecf0f1;
      padding: 0.75rem 1rem;
    }

    .top-icons {
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .logout-btn {
      background: #e74c3c;
      border: none;
      color: white;
      padding: 0.5rem 1rem;
      border-radius: 5px;
      cursor: pointer;
    }

    .hamburger {
      display: none;
      font-size: 24px;
      background: none;
      border: none;
      cursor: pointer;
      margin-right: 1rem;
    }

    .main-content {
      flex-grow: 1;
      padding: 1rem;
    }

    .content-section {
      display: none;
    }

    .content-section.active {
      display: block;
    }

    @media (max-width: 767px) {
      .sidebar {
        position: absolute;
        top: 0;
        left: 0;
        height: 100vh;
        z-index: 1000;
        transform: translateX(-100%);
      }

      .sidebar.show {
        transform: translateX(0);
      }

      .hamburger {
        display: inline-block;
      }

      .topbar {
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
      }
    }
  </style>
</head>
<body>

  <div class="dashboard-container">
    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
      <div class="sidebar-header">
        <img src="images/sub/usericon.png" class="icon" alt="Employer Icon" />
        <p>Hello,<br><strong>Employer</strong></p>
      </div>
      <nav>
        <a class="active" onclick="showSection('dashboard', this)"><i class="fas fa-chart-line"></i> Dashboard</a>
        <a onclick="showSection('search', this)"><i class="fas fa-magnifying-glass"></i> Search Residents</a>
        <a onclick="showSection('populations', this)"><i class="fas fa-users"></i> Populations</a>
        <a onclick="showSection('add-off', this)"><i class="fas fa-user-plus"></i> Add Officials</a>
        <a onclick="showSection('officials', this)"><i class="fas fa-user-tie"></i> Brg. Official</a>
        <a onclick="showSection('request', this)"><i class="fas fa-envelope"></i> Requests</a>
        <a onclick="showSection('add', this)"><i class="fas fa-house-user"></i> Add Residents</a>
      </nav>
    </aside>

    <!-- Main Area -->
    <div style="flex-grow:1;">
      <div class="topbar">
        <button class="hamburger" id="hamburger" aria-label="Toggle menu">
          <i class="fas fa-bars"></i>
        </button>
        <div class="top-icons">
          <i class="fas fa-bell"></i>
          <button class="logout-btn" onclick="location.href='LogIn.php'">
            <i class="fas fa-arrow-right-from-bracket"></i> Log Out
          </button>
        </div>
      </div>

      <main class="main-content">
        <section id="dashboard" class="content-section active">
          <h2>Dashboard</h2>
          <p>Add codes here</p>
        </section>

        <section id="search" class="content-section">
          <h2>Search Residents</h2>
          <?php include 'data/search.php'; ?>
        </section>

        <section id="populations" class="content-section">
          <h2>Populations</h2>
          <?php include 'data/viewall.php'; ?>
        </section>

        <section id="add-off" class="content-section">
          <h2>Add Officials</h2>
          <?php include 'data/add-off.php'; ?>
        </section>

        <section id="officials" class="content-section">
          <h2>Edit/Delete Officials</h2>
          <?php include 'data/brgofficials.php'; ?>
        </section>

        <section id="request" class="content-section">
          <h2>Requests</h2>
          <p>Add codes here</p>
        </section>

        <section id="add" class="content-section">
          <?php include 'data/res-info.php'; ?>
        </section>
      </main>
    </div>
  </div>

  <script>
    // Sidebar section toggle
    function showSection(sectionId, element) {
      const sections = document.querySelectorAll(".content-section");
      const navLinks = document.querySelectorAll("nav a");

      sections.forEach(sec => sec.classList.remove("active"));
      navLinks.forEach(link => link.classList.remove("active"));

      document.getElementById(sectionId).classList.add("active");
      if (element) element.classList.add("active");

      // Auto-hide sidebar on mobile after selection
      const sidebar = document.getElementById('sidebar');
      if (window.innerWidth < 768) {
        sidebar.classList.remove('show');
      }
    }

    // Toggle sidebar on hamburger click
    document.getElementById('hamburger').addEventListener('click', () => {
      document.getElementById('sidebar').classList.toggle('show');
    });
  </script>

</body>
</html>
