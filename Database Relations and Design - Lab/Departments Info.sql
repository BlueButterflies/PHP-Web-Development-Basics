USE restaurant;

SELECT department_id, COUNT(id) AS number_of_employees
FROM employees
GROUP BY department_id