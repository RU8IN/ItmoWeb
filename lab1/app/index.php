<?php
require "php/generators.php";
require "php/Rows.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лабораторная работа №1</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="js/Checker.js"></script>
    <script src="js/submit.js"></script>
</head> 

<body>
    <table class="header">
        <tr>
            <td class="header__name">Васькин Вячеслав P3211</td>
            <td class="header__var">Вариант - <b>2197</b></td>
        </tr>
    </table>

    <table class="main">
        <table class="main__quest">
            <tr>
                <td>
                    Разработать PHP-скрипт, определяющий попадание точки на координатной плоскости в заданную область, и создать HTML-страницу, которая формирует данные для отправки их на обработку этому скрипту.

                    Параметр R и координаты точки должны передаваться скрипту посредством HTTP-запроса. Скрипт должен выполнять валидацию данных и возвращать HTML-страницу с таблицей, содержащей полученные параметры и результат вычислений - факт попадания или непопадания точки в область. Предыдущие результаты должны сохраняться между запросами и отображаться в таблице.

                    Кроме того, ответ должен содержать данные о текущем времени и времени работы скрипта.
                </td>
            </tr>
            <tr>
                <td>
                    <b>Разработанная HTML-страница должна удовлетворять следующим требованиям:</b>
                </td>
            </tr>
            <tr>
                <td>
                    <ul>
                        <li>Для расположения текстовых и графических элементов необходимо использовать табличную верстку.</li>
                        <li>Данные формы должны передаваться на обработку посредством GET-запроса.</li>
                        <li>Таблицы стилей должны располагаться в отдельных файлах.</li>
                        <li>При работе с CSS должно быть продемонстрировано использование селекторов идентификаторов, селекторов потомств, селекторов псевдоклассов, селекторов классов а также такие свойства стилей CSS, как наследование и каскадирование.</li>
                        <li>HTML-страница должна иметь "шапку", содержащую ФИО студента, номер группы и новер варианта. При оформлении шапки необходимо явным образом задать шрифт (serif), его цвет и размер в каскадной таблице стилей.</li>
                        <li>Отступы элементов ввода должны задаваться в пикселях.</li>
                        <li>Страница должна содержать сценарий на языке JavaScript, осуществляющий валидацию значений, вводимых пользователем в поля формы. Любые некорректные значения (например, буквы в координатах точки или отрицательный радиус) должны блокироваться.</li>
                    </ul>
                </td>
            </tr>
        </table>

        <table class="main__implementation">
            <tr>
                <td id="image"><img src="images/graph.png" alt="картинка.пнг"></td>
                <td>
                    <form name="coords" onsubmit="return false;">
                        <table class="form">
                            <tr id="x">
                                <p>X:
                                <?php generate_radio_buttons(-5, 3, 1);?>
                            </tr>
                            <tr id="y">
                                <p>Y:
                                <input type="text" name="y" require placeholder="-5..3">
                            </tr>
                            <tr id="r">
                                <p>R:
                                <select name="r" require>
                                    <?php generate_options(1, 5, 1);?>
                                </select>
                            </tr>
                            <tr>
                                <button onclick="submitForm();">Отправить</button>
                            </tr>
                        </table>

                    </form>
                </td>
            <tr>

            </tr>
        </table>
        <table class="main__results">
            <th>Время</th>
            <th>Координаты</th>
            <th>Попадание</th>
            <th>Время выполнения скрипта</th>
            <tr>
            </tr>
            <tfoot id="receivingData">
                    <?php
                    if (isset($_SESSION["rows"])) {
                        printRows($_SESSION["rows"]);
                    }
                    ?>
            <?php ?>
        </table>
    </table>

    <table class="footer">

    </table>
</body>

</table>
</body>
</html>