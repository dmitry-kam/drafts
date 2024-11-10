create table orders(
  id bigserial,
  dt date,
  client_id integer,
  status smallint
);

create table clients(
  id bigserial,
  name varchar(50)

);

-------

insert into clients(name) values ('Иван'),('Сергей'), ('Петр');
insert into orders(dt, client_id, status) values
('2021-01-01', 1, 1),
('2021-05-01', 1, 1),
('2022-06-01', 1, 1),
('2021-07-01', 1, 1),
('2023-01-02', 1, 1);
insert into orders(dt, client_id, status) values
('2021-01-01',2, 1),
('2021-01-02', 2, 1),
('2022-02-02', 2, 1),
('2023-12-02', 2, 1),
('2023-12-05', 2, 1);
insert into orders(dt, client_id, status) values
('2023-12-25',3, 1),
('2023-12-22', 3, 1);

-- select * from clients;
 select * from orders;

-- Есть интернет магазин, у которого есть связь клиенты и заказы.
-- Нужно получить список клиентов, у которых третий заказ был сделан в декабре 2023 года, учитывая то что первый и
-- второй заказы могли быть сделаны как в декабре 2023 года так и в 22-21 году (в любое время до декабря 2023)


SELECT * FROM clients WHERE id IN
(SELECT t2.clientId FROM
(
SELECT o1.id, o1.client_id  as clientId, MAX(o1.dt) as maxDate FROM orders o1 INNER JOIN clients c1
ON o1.client_id = c1.id
WHERE client_id IN
(
  SELECT id FROM
  (SELECT id, COUNT(*) as ordersQty FROM clients c INNER JOIN
  orders o ON o.client_id = c.id
  GROUP BY ordersQty HAVING ordersQty >= 3) as t1
)
AND maxDate LIKE '2023-12-%' # TIMESTAMP / MONTH / YEAR
ORDER BY dt ASC TOP 3
 ) as t2 )