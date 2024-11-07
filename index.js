document.addEventListener("DOMContentLoaded", async (event) => {
  console.log("Request send");

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

  let container = document.getElementById('innerDiv');
  let button = document.getElementById("btn");
  let input = document.getElementById("inputId");
  
  button.addEventListener("click", async () =>{ console.log("Button clicked.")  
    let userChoice = input.value
    console.log(userChoice)
    const response = await fetch("http://localhost:8000/api/orders.php", {
        method: "POST",
        // ...
      });

   } )

  console.log(container);
  container.innerHTML = menuItemsAsJson[1].name;
});
