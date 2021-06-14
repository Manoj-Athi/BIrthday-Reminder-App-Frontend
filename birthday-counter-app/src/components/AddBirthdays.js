import React, { useState } from 'react'
import '../App.css';

const AddBirthdays = ({ add }) => {
    const [Name, setName] = useState('');
    const [Dob, setDob] = useState('');

    const onSubmit = (e) => {
        e.preventDefault()

        if(!Name && !Dob){
            alert("Enter Name and Date of Birth");
        } else {
            add({ Name, Dob })
            
            setName('')
            setDob('')
        }
    }

    return (
        <form onSubmit={onSubmit} className="form-container">
            <div className="form-elements">
                <label htmlFor="name">Name : </label>
                <input type="text" id="name" value={Name} onChange={(e) => setName(e.target.value)}/><br />
            </div>
            <div className="form-elements">
                <label htmlFor="date">D.O.B : </label>
                <input type="date" id="date" value={Dob} onChange={(e) => setDob(e.target.value)}/><br />
            </div>
            <input className="submit-button" type="submit"/>
        </form>
    )
}

export default AddBirthdays
