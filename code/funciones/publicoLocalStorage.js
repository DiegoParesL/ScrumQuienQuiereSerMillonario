function publicoLocalStorage() {
    window.localStorage.setItem("usedPublic",0);
    console.log("localStorage modificado a :"+window.localStorage.getItem("usedPublic"))
}
publicoLocalStorage();