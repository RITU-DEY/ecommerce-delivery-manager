function assignOrder(e,id){
    e.preventDefault();

    let agent_id = document.getElementById("agent"+id).value;

    if(agent_id == ""){
        alert("Select agent first");
        return;
    }

    fetch("/ecommerce_delivery_manager/api/assign_order.php", {
    method: "POST",
    headers: {"Content-Type": "application/x-www-form-urlencoded"},
    body: "order_id="+id+"&agent_id="+agent_id
})
.then(res => res.json())
.then(data => {
    console.log(data); // DEBUG

    alert(data.message);

    if(data.success){
        location.reload();
    }
})
.catch(err => {
    console.log(err);
    alert("Request failed!");
});
}