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
  // document.getElementsByTagName('div');
  // document.querySelectorAll('ul li');
  // let other = document.createElement('div');
  // element.innerHTML = '';
  // element.appendChild(other);

  console.log(container);
  container.innerHTML = menuItemsAsJson[1].name;
});
