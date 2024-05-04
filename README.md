# 崩鐵圖鑑

此網站是專門給崩壞：星穹鐵道的玩家查詢角色資訊，可以提供玩家即時更新角色資
訊，並且可以立即查詢每位角色的屬性、命途、光錐、遺器等。為了簡化，本系統假設一
個角色只搭配一個專屬光錐，且只有一套最佳遺器，但一套遺器可被不同角色使用。

## 系統中的表格定義與正規型式分析

1.role表格
  CREATE TABLE role(
  ID int(15) NOT NULL //ID
  name varchar(255) NOT NULL, //角色名
  path varchar(255) NOT NULL, //命途
  type varchar(255) NOT NULL, //屬性
  relics_id int(15) NOT NULL,//遺器
  PRIMARY KEY (ID)
  FOREIGN KEY (relics_id ) REFERENCES relics(relics_id)
);
F = {ID→name, ID→path, ID→type, ID→relics_id}
ID代表一個特定的角色，所以可以決定唯一的角色名、命途、屬性、遺器
ID是一個candidate key符合BCNF

2.light_cone表格
CREATE TABLE light_cone (
ID int(15) NOT NULL, //ID
name varchar(255) NOT NULL, //光錐名
path varchar(255) NOT NULL, //命途
description varchar(255) NOT NULL, //描述
PRIMARY KEY (name),
FOREIGN KEY (ID) REFERENCES role(ID)
);
F = {ID→name, ID→path, ID→description}
ID代表一個特定的光錐，所以可以決定唯一的光錐名、命途、描述
ID是一個candidate key符合BCNF

3.relics表格
CREATE TABLE relics (
relics_id bigint(15) NOT NULL, //遺器ID
name varchar(255) NOT NULL, //遺器name
two_sets varchar(255) NOT NULL, //2件套
four_sets varchar(255) NOT NULL, //4件套
PRIMARY KEY (relics_id )
);
F = {relics_id→name, relics_id→four_sets, relics_id→two_sets}
relics_id代表一個特定的遺器，所以可以決定唯一的遺器name、2件套、4件套
relics_id是一個candidate key符合BCNF

