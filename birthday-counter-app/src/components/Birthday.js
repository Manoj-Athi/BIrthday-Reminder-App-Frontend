import React from 'react'
import '../App.css';
import { FaTimes } from 'react-icons/fa'

const Birthday = ({ birthday , onDelete}) => {
    return (
        <div className="text-container">
            <h4>{birthday.Name}</h4>
            <h4>{birthday.Dob}</h4>
            <h4><span>{birthday.daysRemaining}</span> days to go</h4>
            <h4><FaTimes className="x-icon" onClick={() => onDelete(birthday.id)}/></h4>
        </div>
    )
}

export default Birthday
