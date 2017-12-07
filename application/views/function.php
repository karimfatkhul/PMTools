<script>
//Function for open sidenav
function openNav() {
    document.getElementById("mySidenav").style.width = "200px";
    document.getElementById("main").style.marginLeft = "200px";
    document.getElementById("nav").style.marginLeft = "200px";
    document.getElementById("burger").style.display = "none";
}
//Function for close sidenav
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.getElementById("nav").style.marginLeft = "auto";
    document.getElementById("burger").style.display = "block";
}
</script>
