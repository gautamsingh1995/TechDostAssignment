1.Find the Nth Highest Salary Without Using LIMIT

SELECT DISTINCT salary
FROM employees e1
WHERE (
SELECT COUNT(DISTINCT salary)
FROM employees e2
WHERE e2.salary > e1.salary
) = N - 1;
Replace N with the desired rank (e.g., 3 for 3rd highest).

2. Retrieve All Employees Who Joined in the Last 30 Days

SELECT *
FROM employees
WHERE join_date >= CURDATE() - INTERVAL 30 DAY;

3.Employees Earning More Than Department’s Average Salary

SELECT e.*
FROM employees e
JOIN (
SELECT department_id, AVG(salary) AS avg_salary
FROM employees
GROUP BY department_id
) d ON e.department_id = d.department_id
WHERE e.salary > d.avg_salary;


4. Convert a Comma-Separated String into Rows

-- Example string: 'apple,banana,grape'
-- Assume @str holds your input
SET @str := 'apple,banana,grape';

SELECT TRIM(SUBSTRING_INDEX(SUBSTRING_INDEX(@str, ',', numbers.n), ',', -1)) AS item
FROM (
SELECT 1 AS n UNION SELECT 2 UNION SELECT 3 UNION SELECT 4
UNION SELECT 5 UNION SELECT 6 UNION SELECT 7 UNION SELECT 8
) numbers
WHERE n <= LENGTH(@str) - LENGTH(REPLACE(@str, ',' , '' )) + 1; 5. Find the First Order for Each Customer SELECT o.*
    FROM orders o JOIN ( SELECT customer_id, MIN(order_date) AS first_order_date FROM orders GROUP BY customer_id )
    first_order ON o.customer_id=first_order.customer_id AND o.order_date=first_order.first_order_date; 6. Count of
    Orders Placed Each Day in the Last 7 Days SELECT DATE(order_date) AS day, COUNT(*) AS total_orders FROM orders WHERE
    order_date>= CURDATE() - INTERVAL 7 DAY
    GROUP BY day
    ORDER BY day DESC;


    7. Fetch Customers if They Exist in Orders Table

    SELECT *
    FROM customers
    WHERE EXISTS (
    SELECT 1
    FROM orders
    WHERE orders.customer_id = customers.id
    );


    8. Fetch Customers with Total Orders, Amounts, Discount, Delivered Count

    SELECT c.id, c.name,
    COUNT(o.id) AS total_orders,
    SUM(o.amount) AS total_amount,
    SUM(o.discount) AS total_discount,
    SUM(CASE WHEN o.status = 'delivered' THEN 1 ELSE 0 END) AS total_delivered
    FROM customers c
    LEFT JOIN orders o ON o.customer_id = c.id
    GROUP BY c.id, c.name;


    9. All Employees with Sum of Presents & Leaves in Current Month

    SELECT e.id, e.name,
    SUM(CASE WHEN a.status = 'present' THEN 1 ELSE 0 END) AS present_days,
    SUM(CASE WHEN a.status = 'leave' THEN 1 ELSE 0 END) AS leave_days
    FROM employees e
    LEFT JOIN attendance a ON a.employee_id = e.id
    AND MONTH(a.date) = MONTH(CURDATE())
    AND YEAR(a.date) = YEAR(CURDATE())
    GROUP BY e.id, e.name;


    10. Top 3 Most Sold Products in Last Month

    SELECT p.id, p.name, SUM(oi.quantity) AS total_sold
    FROM order_items oi
    JOIN orders o ON oi.order_id = o.id
    JOIN products p ON oi.product_id = p.id
    WHERE o.order_date BETWEEN DATE_SUB(CURDATE(), INTERVAL 1 MONTH) AND CURDATE()
    GROUP BY p.id, p.name
    ORDER BY total_sold DESC
    LIMIT 3;