import React from 'react'
import { useParams } from 'react-router-dom';


const Election = (props) => {
    const { type, name, year } = useParams();

    return (
        <div>
            Not Implemented
            {type}
            {name}
            {year}
        </div>
    )
}

export default Election
