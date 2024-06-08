const handleOpen = () => {
    const aside = document.getElementById("aside");
    const listIcon = document.querySelector(".bi.bi-list");
    const closeIcon = document.querySelector(".bi.bi-x-lg");

    if (aside.style.display === "inline-block") {
        listIcon.style.display = "inline-block";
        closeIcon.style.display = "none";
        aside.style.display = "none";
    } else {
        listIcon.style.display = "none";
        closeIcon.style.display = "inline-block";
        aside.style.display = "inline-block";
    }
};
let arrow = document.querySelectorAll(".arrow");
for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
        let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
        arrowParent.classList.toggle("showMenu");
    });
}
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".bx-menu");
console.log(sidebarBtn);
sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
});

const closeIcon = document.querySelector(".bi.bi-x-lg");




