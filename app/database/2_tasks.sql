CREATE TABLE tasks {
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title TEXT,
    description TEXT,
    priority INTEGER,
    status INTEGER,
    progress INTEGER,
    created_at INTEGER,
    completed_at INTEGER
    }