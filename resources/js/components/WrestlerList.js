import React, { useState, useEffect } from 'react';
import { makeStyles } from '@material-ui/core/styles';
import List from '@material-ui/core/List';
import { Link } from 'react-router-dom'
import WrestlerListItem from './WrestlerListItem';

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

export default function WrestlerList() {
  const classes = useStyles();

  const [wrestlers, setWrestlers] = useState([]);
  const [companyString, setCompanyString] = useState([]);

  const fetchData = async () => {
    const wrestlers = await axios.get('/api/wrestlers').then(response => response.data);

    setWrestlers(wrestlers);
  }

  useEffect(() => {
    fetchData();
  }, [])

  const getCompanyString = (wrestler) => {
    const { promotion } = wrestler.currentShow;

    setCompanyString(`${wrestler.currentShow.name}, ${promotion.alias}`)
  }

  const primaryTextStyle = {
    fontSize: 24
  }

  const wrestlerAvatar = (colour) => {
    return {
      border: `2px solid ${colour}`,
      borderRadius: 50
    }
  }

  const wrestlerKebabCase = (wrestler) => wrestler.ring_name
    .replace(/([a-z])([A-Z])/g, '$1-$2')    // get all lowercase letters that are near to uppercase ones
    .replace(/[\s_]+/g, '-')                // replace all spaces and low dash
    .toLowerCase()                          // convert to lower case


  return (
    <List className={classes.root}>
      {wrestlers.map((wrestler, index) =>
        <Link
          className=''
          to={`/${wrestlerKebabCase(wrestler)}`}
          key={wrestler.uuid}
        >
          <WrestlerListItem
            index={index}
            wrestler={wrestler}
          />

          {/* <ListItem key={index}>
            <ListItemAvatar className={this.wrestlerAvatar('blue')}>
              <Avatar src={wrestler.picture} className={classes.large} />
            </ListItemAvatar>
            <ListItemText
              primaryTypographyProps={{style: primaryTextStyle }}
              secondaryTypographyProps={classes.listSecondaryText}
              primary={wrestler.ring_name}
              secondary={`${wrestler.currentShow.name}, ${wrestler.currentShow.promotion.alias}`}
              className={classes.wrestlerText}
            />
            <AssessmentOutlinedIcon />
          </ListItem> */}
        </Link>
      )}
    </List>
  );
}