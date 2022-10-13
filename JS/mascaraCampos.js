function mascara(i,atributo) {
    var v = i.value;
    if (isNaN(v[v.length-1])) { // impede entrar outro caractere que não seja número
        i.value = v.substring(0, v.length-1);
        return;
    }
    if (atributo == "cpf") {
        i.setAttribute("maxlength", "14");
        if (v.length == 3 || v.length == 7) i.value += ".";
        if (v.length == 11) i.value += "-";
    }
    /*if (atributo == "tele") {
        i.setAttribute("maxlength", "14"); 
        //i.value += "(";
        if (v.length == 2) i.value += ")";
        if (v.length == 9) i.value += "-";
    }*/
}