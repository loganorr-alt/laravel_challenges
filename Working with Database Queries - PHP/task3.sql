/* presuming sales and products aren't in the same table, you need to join them on the product_id column */
select p.product_id, p.product_name, sum(s.uuid) 
from sales s
join products p on s.product_id = p.product_id
group by p.product_id, p.product_name /*postgreSQL requires grouping if an aggregate is used*/
order by sum(s.uuid) desc
limit 5;
