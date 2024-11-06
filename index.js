console.log("Hallo Welt");

let x = await fetch("./api/menu.php");



    const new_data = async () => {
        const RESPONSE = await fetch("./api/menu.php");

        if (!RESPONSE.ok) console.log("Error fetching data");
        const countriesDataUnsorted = await RESPONSE.json();

    };

console.log(x);
