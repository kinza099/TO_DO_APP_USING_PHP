<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do App - About</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: #f8fafc;
            color: #334155;
            line-height: 1.6;
            min-height: 100vh;
        }

        /* Navbar Styles */
        .navbar {
            background: white;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            position: sticky;
            top: 0;
            z-index: 100;
            padding: 0 20px;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 64px;
        }

        .nav-brand {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1e293b;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 32px;
        }

        .nav-link {
            color: #64748b;
            text-decoration: none;
            font-weight: 500;
            padding: 8px 0;
            position: relative;
            transition: color 0.2s ease;
        }

        .nav-link:hover {
            color: #3b82f6;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: #3b82f6;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .nav-link.active {
            color: #3b82f6;
        }

        .nav-link.active::after {
            width: 100%;
        }

        /* Main Content */
        .main-content {
            padding: 40px 20px;
            min-height: calc(100vh - 64px);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }

        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            padding: 32px;
            text-align: center;
        }

        .about-header {
            margin-bottom: 24px;
        }

        .about-header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 16px;
        }

        .about-content {
            max-width: 500px;
            margin: 0 auto;
        }

        .about-content p {
            font-size: 18px;
            color: #64748b;
            line-height: 1.7;
            margin-bottom: 24px;
        }

        .features-list {
            text-align: left;
            background-color: #f8fafc;
            border-radius: 8px;
            padding: 24px;
            margin-top: 24px;
        }

        .features-list h3 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 16px;
            text-align: center;
        }

        .features-list ul {
            list-style: none;
            padding: 0;
        }

        .features-list li {
            padding: 8px 0;
            color: #64748b;
            position: relative;
            padding-left: 24px;
        }

        .features-list li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: #3b82f6;
            font-weight: bold;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #3b82f6;
            text-decoration: none;
            font-weight: 500;
            margin-top: 24px;
            padding: 12px 24px;
            border: 2px solid #3b82f6;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .back-link:hover {
            background-color: #3b82f6;
            color: white;
            transform: translateY(-1px);
        }

        /* Mobile Styles */
        @media (max-width: 768px) {
            .navbar {
                padding: 0 16px;
            }

            .nav-container {
                height: 56px;
            }

            .nav-brand {
                font-size: 1.25rem;
            }

            .nav-links {
                gap: 20px;
            }

            .main-content {
                padding: 24px 16px;
                min-height: calc(100vh - 56px);
            }

            .card {
                padding: 24px;
            }

            .about-header h1 {
                font-size: 1.75rem;
            }

            .about-content p {
                font-size: 16px;
            }
        }

        @media (max-width: 480px) {
            .nav-links {
                gap: 16px;
            }

            .features-list {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="index.html" class="nav-brand">To-Do App</a>
            <ul class="nav-links">
                <li><a href="index.php" class="nav-link">Home</a></li>
                <li><a href="about.php" class="nav-link active">About</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <div class="card">
                <div class="about-header">
                    <h1>About This App</h1>
                </div>

                <div class="about-content">
                    <p>
                        This is a simple To-Do List application where you can add, complete, and delete tasks to stay organized. 
                        Built with clean, modern design principles to help you focus on what matters most.
                    </p>

                    <div class="features-list">
                        <h3>Features</h3>
                        <ul>
                            <li>Add new tasks quickly and easily</li>
                            <li>Mark tasks as completed</li>
                            <li>Delete tasks you no longer need</li>
                            <li>Clean and intuitive interface</li>
                            <li>Responsive design for all devices</li>
                            <li>Modern and minimalistic styling</li>
                        </ul>
                    </div>

                    <a href="index.html" class="back-link">
                        ← Back to To-Do List
                    </a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>