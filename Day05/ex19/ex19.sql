SELECT  TO_DAYS(MAX(`date`)) - TO_DAYS(MIN(`date`)) AS `uptime`
FROM `member_history`;
