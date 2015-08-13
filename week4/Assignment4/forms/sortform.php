<form action="#" method="GET">
    <fieldset>
        <legend>Sort</legend>
       

        <label>Choose a column to sort by: </label>  
        <select name="column">
            <option value="id">ID</option>
            <option value="corp">Corp</option>
            <option value="incorpDate">Incorp. Date</option>
            <option value="email">Email</option>
            <option value="zipcode">Zipcode</option>
            <option value="owner">Owner</option>
            <option value="phone">Phone</option>
        </select>
        <label> Order: </label>
        <input type="radio" name="order" value="asc">ASC</input>
        <input type="radio" name="order" value="desc">DESC</input>
        <input type="hidden" name="action" value="sort" />
        <input type="submit" value="Submit" />
    </fieldset>    
</form>
