-- test zapytania
SELECT o.id, u.name, c.cart_id, c.photo, c.rodzaj, c.format, c.cena, c.ilosc FROM cart c, orders o, users u
WHERE c.cart_id = o.cart_id AND o.user_id = u.id AND c.status = 0;

-- wyciąg z bazy
SELECT o.id, o.total_order, u.name, u.email, u.kid, u.user_phone, u.group, c.cart_id, c.photo, c.rodzaj, c.format, c.cena, c.ilosc, c.tekst FROM cart c, orders o, users u
WHERE c.cart_id = o.cart_id AND o.user_id = u.id AND c.status = 0 AND u.id > 30;

-- do excela
SELECT o.id, u.kid, u.name, u.email, u.user_phone, c.photo, c.rodzaj, c.format, c.cena, c.ilosc, c.tekst, u.zgoda_www, u.zgoda_reklama, u.zgoda_email FROM cart c, orders o, users u
WHERE c.cart_id = o.cart_id AND o.user_id = u.id AND c.status = 0 AND u.id > 30;

-- sumowanie zamowień
SELECT SUM(total_order) FROM orders


-- zestawienie zamowień
SELECT o.id, u.name, o.total_order FROM orders o INNER JOIN users u ON u.id = o.user_id;
-- lub
SELECT o.id, u.name, o.total_order FROM orders o, users u WHERE u.id = o.user_id;
