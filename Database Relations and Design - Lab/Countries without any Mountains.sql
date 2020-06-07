USE geography;

SELECT COUNT(c.country_code) as country_count FROM countries as c 
LEFT JOIN mountains_countries AS m_c ON c.country_code = m_c.country_code
 WHERE m_c.mountain_id IS NULL;