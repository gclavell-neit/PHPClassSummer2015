<form action="#" method="GET">
    <fieldset>
        <legend>Search</legend>
        <label>Choose a column to search by: </label>  
        <select name="column">
            <option value="id">ID</option>
            <option value="corp">Corp</option>
            <option value="incorpDate">Incorp. Date</option>
            <option value="email">Email</option>
            <option value="zipcode">Zipcode</option>
            <option value="owner">Owner</option>
            <option value="phone">Phone</option>
        </select>
        <input name="search" type="search"/>
    
         <input type="hidden" name="action" value="search" />
        <input type="submit" value="Submit" />
    </fieldset>            
</form>
