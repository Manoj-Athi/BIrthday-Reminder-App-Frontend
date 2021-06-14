import React from 'react'
import '../App.css'
import Birthday from './Birthday';

const BirthdayList = ({ birthdays , onDelete }) => {
    return (
        <div className="birthday-list">
            { birthdays.map((birthday) => (
            <Birthday key={birthday.id} birthday={ birthday } onDelete={ onDelete }/>
            ))}
        </div>
    )
}

export default BirthdayList
