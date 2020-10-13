<?php
add_action( 'wp_head', function () { ?>
<script>

const subtotalNode = document.createElement("span")
subtotalNode.textContent = "Subtotal: "



document.addEventListener("DOMContentLoaded", () => {
    totalNode = document.querySelector("#price_calculator .calculated-price")
    // add demonsions thead
    const demtableNode = document.querySelector("#price_calculator tbody")
    const thead = document.createElement("thead")
    const tr = document.createElement("tr")
    thead.appendChild(tr)
    const td = document.createElement("td")
    td.innerText = "Enter Interior Dimensions"
    td.style.fontWeight = 700
    td.style.padding = "8px 8px 16px 0"
    tr.appendChild(td)
    demtableNode.parentNode.insertBefore(tr, demtableNode)
    totalNode.addEventListener("DOMSubtreeModified", () => {
        // set Unit Price
        var total = getTotal()
        var unitPrice = getUnitPrice(total).toFixed(2)
        totalNode.querySelector("td:first-child").textContent = `$${unitPrice} each`
        totalNode.querySelector("td:first-child").style.fontSize = '1.5em'
        totalNode.querySelector("td:first-child").style.fontWeight = 700
    })
})

function getTotal() {
    var totalString = totalNode.querySelector(".amount")
    if (totalString) {
        return parseFloat(totalString.textContent.substr(1).replace(",", ""))
    } else {
        return false
    }
}

function getUnitPrice(total) {
    var qtyNode = document.querySelector("#quantity")
    var qty = parseInt(qtyNode.value)
    return total / qty
}
</script>
<?php } );
