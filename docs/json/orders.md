# Json-Schema für orders.php

Dieses Dokument beschreibt das JSON-Schema für die Api orders.php.
Eine Möglichkeit dieses JSON zu versenden ist aus dem Frontend.
Wenn die Implementation von diesem Schema abweicht ist dies
ein Bug und sollte als Issue behandelt werden.

## Beispiel-Eingabe

```json
{
    "order_data": [
        {
            "menu_item_id": 5,
            "quantity": 5
        },
        {
            "menu_item_id": 6,
            "quantity": 2
        }
    ]
}
```

## Eine nicht unbedingt vollständige Liste von Regeln für eine valide Eingabe

-   Es gibt ein Feld "order_data" mit dem Datentyp Liste.
-   In der Liste sind Objekte mit 2 Feldern, "menu_item_id" und "quantity".
-   Die leere Liste ist keine valide Bestellung.
-   "menu_item_id" und "quantity" sind beides positive ganze Zahlen.
