import React from 'react'
import '../App.css'

const Header = ({ birthdays }) => {
    var counter = 0;

    return (
        <div className='header'>
            {birthdays.map((birthday) => (
                Boolean(parseInt(birthday.today, 10)) ?
                 <h4><span>{birthday.Name}</span> has birthday today</h4>:
                  ++counter && counter === birthdays.length && <h4>No one has birthday today</h4>   
            ))}
        </div>
        
    )
}

export default Header
