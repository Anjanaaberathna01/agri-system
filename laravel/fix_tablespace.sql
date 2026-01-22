-- Fix MySQL 8.0 tablespace issue
USE agri_system;

-- Discard all orphaned tablespaces
ALTER TABLE migrations DISCARD TABLESPACE;

-- If other tables have issues, we'll handle them too
-- Drop the problematic migrations table completely
DROP TABLE IF EXISTS migrations;

COMMIT;
