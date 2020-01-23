import React from 'react';
import { makeStyles } from '@material-ui/core/styles';
import Grid from '@material-ui/core/Grid';
import Paper from '@material-ui/core/Paper';
import Typography from '@material-ui/core/Typography';
import ButtonBase from '@material-ui/core/ButtonBase';
import WrestlerStatusItem from './WrestlerStatusItem';

const useStyles = makeStyles(theme => ({
    root: {
        flexGrow: 1,
    },
    paper: {
        padding: theme.spacing(2),
        margin: 'auto',
        maxWidth: 500,
    },
    image: {
        width: 128,
        height: 128,
    },
    img: {
        margin: 'auto',
        display: 'block',
        maxWidth: '100%',
        maxHeight: '100%',
    },
    separator: {
        paddingTop: 5,
        paddingBottom: 5
    }
}));

export default function WrestlerStatusList({ wrestler }) {
    const classes = useStyles();

    return (
        <div>
            {wrestler.states && (
                <div style={{paddingTop: 10}}>
                {wrestler.states.map((state) => (
                    <>
                    <WrestlerStatusItem status={state} wrestler={wrestler} />
                    <Typography className={classes.separator} align='center'>🤼‍♀️</Typography>
                    </>
                ))}
                </div>
            )}
        </div>
    );
}