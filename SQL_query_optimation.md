#    SQL query optimation

問題：目前有個圖書館的資料庫，"書庫"表中的 header 書本、作者、年分，而資料量很大至一百萬本書，這時候若要查詢某位作者有甚麼書時，效率非常差。

### Use indexes
Clustered indexes 是一種在資料庫表中排序和存儲數據行的方式，決定了物理上數據行的排序順序，並將它們存儲在表中。換句話說，表的數據行的物理順序將與叢集索引的排序順序相同。
每個表**只能有一個叢集索引**，因此應謹慎選擇應該作為叢集索引的列。如果表已經有了叢集索引，則通常使用非叢集索引來支持其他查詢。


Non-clustered indexes 是另一種在資料庫表中提高查詢性能的索引類型，他**不影響實際數據行的物理排序和存儲**。相反，它創建一個獨立的數據結構，其中包含列值和指向實際數據行的指標。

![image](https://hackmd.io/_uploads/SJkgfe9Ta.png)

``` sql
CREATE INDEX idx_author ON books (author);
```
以上程式碼將書庫中作者的部份加上 index，主要是他使用 B-tree 的數據結構，原本認為跟JavaScript 中的 Object 類似，但後來想一下，這樣 key 值是有重複的，而查詢了一下，Object 最是使用 hash table 的資料結構，這兩者是不同的分別有優缺點。
但這部分較深入，總而言之 Hash 表適用於**單個鍵**的查詢，而 B-tree 則更適合範圍查詢和需要保持有序性的情況。

另外 index 要加在需要的欄位即可，若將所有欄位都加上 index 這樣會造成在做 CRUD 都會有影響，可以想像就是要增加一個 index 就是增加一了欄位的概念，因為需要增加這個資料結構。

### Optimize JOIN operations

使用連接的方式，優化搜尋，以書庫的例子，變成創建兩張表。
1. 書庫（books）：book_id (Primary Key)、title、publication_year
author_id (Foreign Key referencing Authors table)
1. 作者表（authors）：author_id (Primary Key)、author_name

再以以下方式做查詢，就能夠增加效率。
``` sql
SELECT books.title, books.publication_year
FROM books
INNER JOIN authors ON books.author_id = authors.author_id
WHERE authors.author_name = '目標作者名';
```
而這種方式大概會有以下缺點，複雜性增加、連接的成本等等，需要進行更多的連接才能獲取完整的資訊。

### Consider partitioning and sharding

使用分區時，你將一個大表分成多個更小的表，每個表都有自己的分區鍵。分區鍵通常基於行創建的時間戳，甚至是它們包含的整數值。當你在這個表上執行查詢時，伺服器會自動將你導向到適合你查詢的分區表。這提高了性能，因為它不再搜索整個表，而只搜索其中的一小部分。

sharding 分片與分區相似，只是它不是將一個大表分成小表，而是將一個**大數據庫分成多個小數據庫**。每個數據庫位於不同的伺服器上。不同於分區鍵，這裡有一個分片鍵，它將查詢重定向到適當的數據庫上運行。而也是這原因 sharding 可以增加處理速度，因為負載分擔在不同的伺服器上，它們可以同時工作。由於這些數據庫完全獨立於彼此，還使得數據庫更可用且可靠。如果一個數據庫故障，它不會影響其他數據庫。

創建分區，將書庫分為不同年度
```sql
-- 創建分區
CREATE TABLE books_partitioned (
    book_id INT,
    title VARCHAR(255),
    author VARCHAR(255),
    publication_year INT,
    genre VARCHAR(50),
    PRIMARY KEY (publication_year, book_id)
) PARTITION BY RANGE (publication_year) (
    PARTITION p0 VALUES LESS THAN (2000),
    PARTITION p1 VALUES LESS THAN (2010),
    PARTITION p2 VALUES LESS THAN (2020),
    PARTITION p3 VALUES LESS THAN MAXVALUE
);
```
最主要功能若"年分"經常用於範圍查詢的情況下提高效能，但若要查詢某作者的書，這種分法是沒有用的。但若知道該作者是現代的(即知道作者書版日期都在2020後)，這方法會是有效的。

參考資料：[12 ways to optimize SQL queries for cloud databases](https://www.thoughtspot.com/data-trends/data-modeling/optimizing-sql-queries)