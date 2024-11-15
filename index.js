document.addEventListener("DOMContentLoaded", async (event) => {
    console.log("Request succesfully send");

    const url = " http://localhost:8000/api/menu.php";
    let menuItemsAsJson;
    try {
        const response = await fetch(url);
        if (!response.ok) {
            throw new Error(`Response status: ${response.status}`);
        }

        menuItemsAsJson = await response.json();

        console.log("Request processed");
    } catch (error) {
        console.error(error.message);
    }

    console.log(menuItemsAsJson);

    let container = document.getElementById("innerDiv");
    let button = document.getElementById("btn");
    let input = document.getElementById("inputId");

    button.addEventListener("click", async () => {
        console.log("Button clicked.");
        let btn = document.getElementById("btn");
        let userChoice = input.value;
        console.log(userChoice);
        /* Bei "Klick" erscheint eine Nachricht, dass die Bestellung angekommen ist */
        document.getElementById("thxOrder").innerHTML = "Danke für Ihre Bestellung";
        const request = await fetch("http://localhost:8000/api/orders.php", {
            method: "POST",
            body: JSON.stringify({ id: userChoice }),
        });

        const result = await request.text();
        console.log(result);
    });
    
    console.log(container);
    /* erster Versuch  */
    //container.innerHTML = menuItemsAsJson[1].name + " " + menuItemsAsJson[1].price + "</br>";


    for (let i of menuItemsAsJson) {
        iceCreamItem = i;
            container.innerHTML = container.innerHTML + iceCreamItem.name + iceCreamItem.price + "</br>";
    }
    // document.getElementById("innerDiv").innerHTML = iceCreamItem








});
