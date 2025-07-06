import React from 'react'
import Grid from '@mui/material/Grid';

const CardQA = (props) => {
  return (
    <Grid container direction="column">
      <Grid item>
        <h2>{props.question}</h2>
      </Grid>
      <Grid item>
        {props.answer}
      </Grid>
    </Grid>
  )
}

export default CardQA
