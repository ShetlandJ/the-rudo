import React from 'react';
import { makeStyles } from '@material-ui/core/styles';
import Grid from '@material-ui/core/Grid';
import Paper from '@material-ui/core/Paper';
import Typography from '@material-ui/core/Typography';
import ButtonBase from '@material-ui/core/ButtonBase';

const useStyles = makeStyles(theme => ({
    stateCard: {
        width: 128,
        height: 128,
        backgroundColor: 'red',
        color: 'white'
    },
}));

export default function StatusCard({ state }) {
    const classes = useStyles();

    const stateText = state.toUpperCase();

    return (
        <ButtonBase className={classes.stateCard}>
           <p>{stateText}</p>
        </ButtonBase>
    );
}