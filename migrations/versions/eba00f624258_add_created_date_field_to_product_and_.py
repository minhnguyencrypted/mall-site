"""Add created date field to Product and Store schema

Revision ID: eba00f624258
Revises: 44ac423f8419
Create Date: 2021-11-23 07:57:16.314037

"""
from alembic import op
import sqlalchemy as sa


# revision identifiers, used by Alembic.
revision = 'eba00f624258'
down_revision = '44ac423f8419'
branch_labels = None
depends_on = None


def upgrade():
    # ### commands auto generated by Alembic - please adjust! ###
    op.add_column('products', sa.Column('created', sa.DateTime(), nullable=True))
    op.add_column('stores', sa.Column('created', sa.DateTime(), nullable=True))
    # ### end Alembic commands ###


def downgrade():
    # ### commands auto generated by Alembic - please adjust! ###
    op.drop_column('stores', 'created')
    op.drop_column('products', 'created')
    # ### end Alembic commands ###
