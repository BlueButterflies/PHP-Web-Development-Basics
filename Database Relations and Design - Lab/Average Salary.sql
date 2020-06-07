USE restaurant;

SELECT department_id, CAST(AVG(salary) AS DECIMAL(10, 2))AS average_salary

FROM employees
GROUP BY department_id
ORDER BY department_id ASC