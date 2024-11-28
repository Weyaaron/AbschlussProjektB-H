function load_quantity_based_on_id(id) {
    let menu_id_str = 'menu_id_' + id
    let current_input_el = document.getElementById(menu_id_str)
    return current_input_el.value
}

document.addEventListener('DOMContentLoaded', async (event) => {
    console.log('Request succesfully send')

    const url = ' http://localhost:8000/api/menu.php'
    let menuItemsAsJson
    try {
        const response = await fetch(url)
        if (!response.ok) {
            throw new Error(`Response status: ${response.status}`)
        }

        menuItemsAsJson = await response.json()

        console.log('Request processed')
    } catch (error) {
        console.error(error.message)
    }

    let button = document.getElementById('btn')

    button.addEventListener('click', async () => {
        let json_obj = { order_data: [] }
        //Wir müssen bei eins anfangen weil die 1 die erste Eissorte ist
        for (let i = 1; i <= 3; i++) {
            let current_quantitiy = load_quantity_based_on_id(i)
            json_obj.order_data.push({
                menu_item_id: i,
                quantity: current_quantitiy,
            })
        }
        let json_as_str = json.stringify(json_obj)
        const request = await fetch('http://localhost:8000/api/orders.php', {
            method: 'POST',
            body: json_as_str,
        })

        /* Bei "Klick" erscheint eine Nachricht, dass die Bestellung angekommen ist */
        document.getElementById('thxOrder').innerHTML =
            'Danke für Ihre Bestellung'
    })
})
