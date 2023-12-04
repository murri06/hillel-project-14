<div class="container" style="padding-bottom: 20px">
    <h2>Form Generator</h2>
    <form method="post" action="/form">
        <label>Введіть необхідну кількість кнопок та їх назви через розділювач(,) : </label><br>
        <input type="number" min="0" name="numberButtons" value="0">
        <input type="text" name="namesButtons" value=""><br>

        <label>Введіть необхідну кількість текстових полів та їх назви через розділювач(,) : </label><br>
        <input type="number" min="0" name="numberText" value="0">
        <input type="text" name="namesText" value=""><br>

        <label>Введіть необхідну кількість радіокнопок та їх назви через розділювач(,) : </label><br>
        <input type="number" min="0" name="numberRadio" value="0">
        <input type="text" name="namesRadio" value=""><br>

        <label>Введіть необхідну кількість Чекбоксів та їх назви через розділювач(,) : </label><br>
        <input type="number" min="0" name="numberCheckBox" value="0">
        <input type="text" name="namesCheckBox" value=""><br>

        <label>Введіть необхідну кількість опцій для селектора та їх назви через розділювач(,) : </label><br>
        <input type="number" min="0" name="numberOptions" value="0">
        <input type="text" name="namesOptions" value=""><br>

        <button class="btn btn-primary" type="submit" name="submit">Create</button>
    </form>
</div>

<div class="container">
    <h2>Приклад форми</h2>
    <?= $$keyParam ?>
</div>
