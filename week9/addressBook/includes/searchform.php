<form action="#" method="GET">
    <fieldset>
        <legend>Search</legend>
        <label>Choose a column to search by: </label>  
        <select name="column">
            <option value="fullname">Name</option>
            <option value="address">Address</option>
            <option value="email">Email</option>
            <option value="phone">Phone</option>
        </select>
        <input name="search" type="search"/>
    
         <input type="hidden" name="action" value="search" />
        <input type="submit" value="Submit" />
    </fieldset>            
</form>
