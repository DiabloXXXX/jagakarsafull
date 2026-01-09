-- ============================================
-- SECURITY LOG TABLE
-- For monitoring and auditing security events
-- ============================================

CREATE TABLE IF NOT EXISTS `security_log` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `timestamp` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `event` VARCHAR(100) NOT NULL COMMENT 'Event type: login_failed, login_success, suspicious_activity, etc',
  `severity` ENUM('info', 'warning', 'error', 'critical') NOT NULL DEFAULT 'info',
  `user` VARCHAR(100) NOT NULL COMMENT 'Username or anonymous',
  `ip` VARCHAR(45) NOT NULL COMMENT 'IPv4 or IPv6 address',
  `user_agent` TEXT COMMENT 'Browser user agent string',
  `context` JSON COMMENT 'Additional event context data',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `idx_timestamp` (`timestamp`),
  INDEX `idx_event` (`event`),
  INDEX `idx_severity` (`severity`),
  INDEX `idx_ip` (`ip`),
  INDEX `idx_user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Security events and audit log';

-- ============================================
-- SESSIONS TABLE (for database session handler)
-- More secure than file-based sessions
-- ============================================

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` VARCHAR(128) NOT NULL,
  `ip_address` VARCHAR(45) NOT NULL,
  `timestamp` INT UNSIGNED NOT NULL DEFAULT 0,
  `data` BLOB NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Session storage for enhanced security';

-- ============================================
-- FAILED LOGIN ATTEMPTS TABLE
-- Track brute force attempts
-- ============================================

CREATE TABLE IF NOT EXISTS `failed_login_attempts` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` VARCHAR(45) NOT NULL,
  `email` VARCHAR(255) DEFAULT NULL,
  `attempt_time` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_agent` TEXT,
  `is_blocked` TINYINT(1) NOT NULL DEFAULT 0,
  `block_until` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `idx_ip` (`ip_address`),
  INDEX `idx_email` (`email`),
  INDEX `idx_attempt_time` (`attempt_time`),
  INDEX `idx_blocked` (`is_blocked`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Track failed login attempts for security';

-- ============================================
-- INSERT SAMPLE DATA (for testing)
-- ============================================

-- Log initial setup
INSERT INTO `security_log` (`event`, `severity`, `user`, `ip`, `context`) 
VALUES ('security_tables_created', 'info', 'system', '127.0.0.1', '{"action": "database_migration", "tables": ["security_log", "ci_sessions", "failed_login_attempts"]}');

-- ============================================
-- CLEANUP OLD LOGS (run this monthly via cron)
-- ============================================

-- Delete security logs older than 6 months
-- DELETE FROM `security_log` WHERE `timestamp` < DATE_SUB(NOW(), INTERVAL 6 MONTH);

-- Delete failed login attempts older than 30 days
-- DELETE FROM `failed_login_attempts` WHERE `attempt_time` < DATE_SUB(NOW(), INTERVAL 30 DAY);

-- ============================================
-- USEFUL QUERIES FOR MONITORING
-- ============================================

-- View recent security events
-- SELECT * FROM `security_log` ORDER BY `timestamp` DESC LIMIT 100;

-- View failed login attempts by IP
-- SELECT `ip_address`, COUNT(*) as attempts, MAX(`attempt_time`) as last_attempt 
-- FROM `failed_login_attempts` 
-- WHERE `attempt_time` > DATE_SUB(NOW(), INTERVAL 24 HOUR)
-- GROUP BY `ip_address` 
-- ORDER BY attempts DESC;

-- View blocked IPs
-- SELECT * FROM `failed_login_attempts` 
-- WHERE `is_blocked` = 1 AND `block_until` > NOW();

-- View critical security events
-- SELECT * FROM `security_log` 
-- WHERE `severity` IN ('error', 'critical') 
-- ORDER BY `timestamp` DESC 
-- LIMIT 50;
