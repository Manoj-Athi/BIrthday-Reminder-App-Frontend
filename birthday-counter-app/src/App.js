import React, { useState, useEffect } from 'react';
import './App.css';
import Header from './components/Header'
import BirthdayList from './components/BirthdayList'
import AddBirthdays from './components/AddBirthdays'

function App() {

  const [ birthdayList, setBirthdayList ] = useState([])

  useEffect(() => {

    const getBirthdayList = async () => {
      const birthList = await fetchBirthdayList()
      setBirthdayList(birthList)
    }

    getBirthdayList()

  }, [])

  const fetchBirthdayList = async () => {
    const response = await fetch('http://localhost:8080/index.php?rquest=getdetails')
    const data = await response.json()
    // console.log(data.data)
    return data.data
  }

  const deleteBirthdate = async (id) => {

    await fetch(`http://localhost:8080/index.php?id=${id}&rquest=deletedetails`,{
      method : 'POST',
    })

    setBirthdayList(birthdayList.filter((birthday) => birthday.id !== id))
  }

  const addBirthdays = async (birthday) => {

    const response = await fetch(`http://localhost:8080/index.php?rquest=addbirthday&Dob=${birthday.Dob}&Name=${birthday.Name}`,{
      method : 'POST'
    })
    const data = await response.json();
    setBirthdayList([...birthdayList, data.data])

    // const id = Math.floor(Math.random()*10000) + 1
    // const Birthday = {id, ...birthday}
    // setBirthdayList([...birthdayList, Birthday])
  }


  return (
    <div className="App">
      <h1>Birthday Reminder</h1>
      <Header birthdays={birthdayList} />
      <AddBirthdays add={addBirthdays}/>
      <BirthdayList birthdays={birthdayList} onDelete={deleteBirthdate}/>
    </div>
  );
}

export default App;
