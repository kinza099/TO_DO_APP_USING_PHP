<?php
include 'db.php';


$tasks = [];
$result = mysqli_query($conn, "SELECT * FROM tasks ORDER BY id DESC");
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $tasks[] = $row;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List App</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

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

        .nav-link:hover { color: #3b82f6; }

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

        .nav-link:hover::after { width: 100%; }

        .nav-link.active {
            color: #3b82f6;
        }

        .nav-link.active::after {
            width: 100%;
        }

        .main-content {
            padding: 40px 20px;
            min-height: calc(100vh - 64px);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container { width: 100%; max-width: 600px; margin: 0 auto; }

        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            padding: 32px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 32px;
        }

        .header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 8px;
        }

        .input-section {
            display: flex;
            gap: 12px;
            margin-bottom: 32px;
        }

        .task-input {
            flex: 1;
            padding: 12px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.2s ease;
            outline: none;
        }

        .task-input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .task-input::placeholder { color: #94a3b8; }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-primary {
            background-color: #3b82f6;
            color: white;
        }

        .btn-primary:hover {
            background-color: #2563eb;
            transform: translateY(-1px);
        }

        .btn-secondary {
            background-color: #6b7280;
            color: white;
            padding: 6px 12px;
            font-size: 12px;
        }

        .btn-secondary:hover { background-color: #4b5563; }

        .btn-danger {
            background-color: #ef4444;
            color: white;
            padding: 6px 12px;
            font-size: 12px;
        }

        .btn-danger:hover { background-color: #dc2626; }

        .task-list { list-style: none; }

        .task-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 0;
            border-bottom: 1px solid #f1f5f9;
            gap: 12px;
        }

        .task-item:last-child { border-bottom: none; }

        .task-content {
            flex: 1;
            font-size: 16px;
            color: #334155;
        }

        .task-content.completed {
            text-decoration: line-through;
            color: #94a3b8;
        }

        .task-actions {
            display: flex;
            gap: 8px;
            flex-shrink: 0;
        }

        .empty-state {
            text-align: center;
            padding: 48px 0;
            color: #94a3b8;
        }

        .empty-state p { font-size: 18px; margin-bottom: 8px; }

        .empty-state small { font-size: 14px; }

        @media (max-width: 768px) {
            .navbar { padding: 0 16px; }
            .nav-container { height: 56px; }
            .nav-brand { font-size: 1.25rem; }
            .nav-links { gap: 20px; }
            .main-content { padding: 24px 16px; min-height: calc(100vh - 56px); }
            .card { padding: 24px; }
            .header h1 { font-size: 1.75rem; }
            .task-item { flex-direction: column; align-items: flex-start; gap: 12px; }
            .task-actions { align-self: flex-end; }
        }

        @media (max-width: 480px) {
            .nav-links { gap: 16px; }
            .task-actions { width: 100%; justify-content: flex-end; }
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="index.html" class="nav-brand">To-Do App</a>
            <ul class="nav-links">
                <li><a href="index.php" class="nav-link active">Home</a></li>
                <li><a href="about.php" class="nav-link">About</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <div class="card">
                <div class="header">
                    <h1>To-Do List App</h1>
                </div>

                <form action="add.php" method="POST" class="input-section">
                    <input type="text" name="task" class="task-input" placeholder="Enter a task..." required>
                    <button type="submit" class="btn btn-primary">Add Task</button>
                </form>

              <ul class="task-list">
                    <?php if (!empty($tasks)): ?>
                        <?php foreach ($tasks as $task): ?>
                            <li class="task-item">
                                <span class="task-content <?php echo $task['status'] == 'completed' ? 'completed' : ''; ?>">
                                    <?php echo htmlspecialchars($task['task']); ?>
                                </span>
                                <div class="task-actions">
                                    <?php if ($task['status'] == 'pending'): ?>
                                        <a href="mark_done.php?id=<?php echo $task['id']; ?>" class="btn btn-secondary">Mark as Done</a>
                                    <?php endif; ?>
                                    <a href="delete.php?id=<?php echo $task['id']; ?>" class="btn btn-danger">Delete</a>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="empty-state">
                            <p>No tasks yet!</p>
                            <small>Add a task above to get started.</small>
                        </div>
                    <?php endif; ?>
                </ul>

            </div>
        </div>
    </main>
</body>
</html>
