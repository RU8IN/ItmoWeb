function isNumeric(string) {
    return !isNaN(string);
}

function calculateDigitsAfterPoint(number) {
    number = +number
    if (Number.isInteger(number)) {
        return 0;
    } else {
        return number.toString().split('.')[1].length;
    }
}

class Checker {

    isCorrect(x, y, r) {
        return this.isXCorrect(x) & this.ixYCorrect(y) & this.isRCorrect(r);
    }

    isXCorrect(x) {
        if (x == "") {
            alert("Выберите значение координаты x из предложенных");
            return false;
        }
    
        if (!isNumeric(x)) {
            alert("Выберите координату X");
        }
        return true;
    }

    ixYCorrect(y) {
        
        if (y == "") {
            alert("Поле координаты Y является обязательным");
            return false;
        }
        
        if (!isNumeric(y)) {
            alert("Координата y должна быть числом");
            return false;
        }
        if (calculateDigitsAfterPoint(y) >= 16) {
            alert("Введите координату y с меньшей точностью (до 15 знаков после запятой)");
            return false;
        }
        
        if (y > 3 || y < -5) {
            alert("Координата y должна быть от -5 до 3");
            return false;
        }
    
        return true;
    }

    isRCorrect(r) {
        if (!isNumeric(r)) {
            alert("Радиус должен быть числом");
            return false;
        }
    
        if (r < 0) {
            alert("Радиус должен быть неотрицательным");
            return false;
        }
    
        return true;
    }
    
}