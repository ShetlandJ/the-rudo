import axios from 'axios'
import React, { useState, useEffect } from 'react'
import { Link } from 'react-router-dom'

function WrestlerProfilePicture({ wrestler }) {

    function nameToInitials(fullName) {
        const namesArray = fullName.split(' ');
        if (namesArray.length === 1) return `${namesArray[0].charAt(0)}`;
        else return `${namesArray[0].charAt(0)}${namesArray[namesArray.length - 1].charAt(0)}`;
    }

    const getWrestlerInitials = () => {
        const { ring_name } = wrestler;

        if (!ring_name) {
            return ''
        }

        return nameToInitials(ring_name);
    }

    var imgStyle = {
        backgroundImage: 'url(' + wrestler.picture + ')',
        backgroundSize: 'cover',
        borderRadius: 50,
        width: 100,
        height: 100
    }

    return (
        <div className='wrestler-profile-picture'>
            {wrestler.picture && (
                <img
                className='wrestler-list-image'
                style={imgStyle}
                />
            )}
            {!wrestler.picture && (
                <h2 className='initials'>{getWrestlerInitials()}</h2>
            )}

        </div>
    )
}
export default WrestlerProfilePicture
