import React, { useState, useEffect } from 'react';
import { makeStyles } from '@material-ui/core/styles';
import ListItem from '@material-ui/core/ListItem';
import ListItemText from '@material-ui/core/ListItemText';
import ListItemAvatar from '@material-ui/core/ListItemAvatar';
import Avatar from '@material-ui/core/Avatar';
import AssessmentOutlinedIcon from '@material-ui/icons/AssessmentOutlined';

const useStyles = makeStyles(theme => ({
  root: {
    width: '100%',
    maxWidth: 360,
    backgroundColor: theme.palette.background.paper,
  },
  large: {
    width: theme.spacing(10),
    height: theme.spacing(10),
  },
  wrestlerText: {
    paddingLeft: 14
  },
  listPrimaryText: {
    fontSize: 20
  },
  listSecondaryText: {
    fontSize: 14
  }
}));

export default function WrestlerListItem({ index, wrestler }) {
  const classes = useStyles();

  const primaryTextStyle = {
    fontSize: 24
  }

  const showColours = {
    "Raw": "#db0011",
  }

  const borderColour = showColours[wrestler.currentShow.name];

  return (
    <ListItem key={index}>
      <ListItemAvatar style={{
        border: `2px solid ${borderColour}`,
        borderRadius: 50
      }}>
        <Avatar src={wrestler.picture} className={classes.large} />
      </ListItemAvatar>
      <ListItemText
        primaryTypographyProps={{ style: primaryTextStyle }}
        primary={wrestler.ring_name}
        secondary={`${wrestler.currentShow.name}, ${wrestler.currentShow.promotion.alias}`}
        className={classes.wrestlerText}
      />
      <AssessmentOutlinedIcon />
    </ListItem>
  );
}