import React from 'react'
import Grid from '@mui/material/Grid2';
import luisa from '../../assets/img/luisa_salgueiro.jpg'
import ps_logo from '../../assets/img/ps.png'

//TODO: Implementar usando GridV2
const President = (props) => {
    return (
        <div>
            <img src={luisa} alt={props.alt} />
            <h2>Luisa Salgueiro</h2>
            <img src={ps_logo} alt={"Partido Socialista"} />
            <p>2019-</p>
        </div>
    )
}

export default President
