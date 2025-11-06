-- Languages Database Schema

CREATE TABLE IF NOT EXISTS languages (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    code TEXT UNIQUE NOT NULL,
    name TEXT NOT NULL,
    flag_emoji TEXT,
    active BOOLEAN DEFAULT 1,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS lessons (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    language_id INTEGER NOT NULL,
    lesson_number INTEGER NOT NULL,
    title TEXT NOT NULL,
    description TEXT,
    theme TEXT,
    difficulty_level TEXT DEFAULT 'B1',
    active BOOLEAN DEFAULT 1,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (language_id) REFERENCES languages(id) ON DELETE CASCADE,
    UNIQUE(language_id, lesson_number)
);

CREATE TABLE IF NOT EXISTS exercises (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    lesson_id INTEGER NOT NULL,
    exercise_number INTEGER NOT NULL,
    type TEXT NOT NULL, -- 'multiple_choice', 'translation', 'matching', 'word_order', 'fill_blank'
    question TEXT NOT NULL,
    data TEXT NOT NULL, -- JSON data for exercise-specific content
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (lesson_id) REFERENCES lessons(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS vocabulary (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    language_id INTEGER NOT NULL,
    word TEXT NOT NULL,
    translation TEXT NOT NULL,
    part_of_speech TEXT,
    difficulty_level TEXT,
    audio_file TEXT,
    example_sentence TEXT,
    FOREIGN KEY (language_id) REFERENCES languages(id) ON DELETE CASCADE
);

CREATE INDEX IF NOT EXISTS idx_lessons ON lessons(language_id, lesson_number);
CREATE INDEX IF NOT EXISTS idx_exercises ON exercises(lesson_id, exercise_number);
CREATE INDEX IF NOT EXISTS idx_vocabulary ON vocabulary(language_id, word);
