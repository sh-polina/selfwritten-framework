<html>
<form method="GET" action="/analyze">
    <label>Country: <input type="text" name="country"></label>
    <label>City: <input type="text" name="city"></label>

    <label>Is Active:
        <select name="is_active">
            <option value="">Any</option>
            <option value="true">Yes</option>
            <option value="false">No</option>
        </select>
    </label>

    <label>Gender:
        <select name="gender">
            <option value="">Any</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Genderfluid">Genderfluid</option>
            <option value="Nonbinary">Nonbinary</option>
            <option value="Transgender">Transgender</option>
            <option value="Gender nonconforming">Gender nonconforming</option>
            <option value="Bigender">Bigender</option>
        </select>
    </label>

    <label>Birth Date From: <input type="date" name="birth_date_from"></label>
    <label>Birth Date To: <input type="date" name="birth_date_to"></label>

    <label>Salary From: <input type="number" step="0.01" name="salary_from"></label>
    <label>Salary To: <input type="number" step="0.01" name="salary_to"></label>

    <label>Has Children:
        <select name="has_children">
            <option value="">Any</option>
            <option value="true">Yes</option>
            <option value="false">No</option>
        </select>
    </label>

    <label>Family Status: <input type="text" name="family_status"></label>

    <label>Registration Date From: <input type="date" name="registration_date_from"></label>
    <label>Registration Date To: <input type="date" name="registration_date_to"></label>

    <button type="submit">Find</button>
</form>
</html>