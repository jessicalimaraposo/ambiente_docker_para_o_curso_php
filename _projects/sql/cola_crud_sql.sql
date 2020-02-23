/*

-------------------------------------------------------------------------------------------
--Inserir dados
INSERT INTO Customers (CustomerName, ContactName, Address, City, PostalCode, Country)
VALUES ('Cardinal','Tom B. Erichsen','Skagen 21','Stavanger','4006','Norway');

-------------------------------------------------------------------------------------------
--Secionar todos os items
SELECT * from Customers;

-------------------------------------------------------------------------------------------
--Selecionar um item específico
SELECT * FROM Customers WHERE CustomerID=111;

-------------------------------------------------------------------------------------------
--Atualizar dados de item 
UPDATE Customers SET ContactName='Alfred Schmidt', City='Frankfurt' WHERE CustomerID=109;

-------------------------------------------------------------------------------------------
--Deletar um item específico
DELETE FROM Customers WHERE CustomerID=110;

*/